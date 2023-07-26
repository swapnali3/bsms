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

<?= $this->Html->css('cstyle.css') ?>
<!--<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?> -->
<!-- <?= $this->Html->css('v_index.css') ?> -->
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
                            <p>Name :
                                <b>
                                    <?= h($vendorTemp->name) ?>
                                </b>
                            </p>
                        </li>
                        <li>
                            <p>Mobile No :
                                <b>
                                    <?= h($vendorTemp->mobile) ?>
                                </b>
                            </p>
                        </li>
                        <li>
                            <p>Email ID :
                                <b>
                                    <?= h($vendorTemp->email) ?>
                                </b>
                            </p>
                        </li>
                        <li>
                            <p>SAP Vendor Code :
                                <b>
                                    <?= !empty($vendorTemp->sap_vendor_code) ? $vendorTemp->sap_vendor_code : '' ?>
                                </b>
                            </p>
                        </li>
                        <li>
                            <p>Status :
                                <b>
                                    <?= $status ?>
                                </b>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                                <?php echo $this->Form->control('purchasing_organization_id', ['disabled' => 'disabled', 'options' => $purchasingOrganizations, 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                                <?php echo $this->Form->control('account_group_id', ['disabled' => 'disabled', 'options' => $accountGroups, 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                                <?php echo $this->Form->control('schema_group_id', ['disabled' => 'disabled', 'options' => $schemaGroups, 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                                <?php echo $this->Form->control('payment_term', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                                <div class="form-group">
                                    <?php
                                    $businessTypes  = [
                                        'PROPRIETARY' => 'Proprietary',
                                        'PARTNERSHIP' => 'Partnership Concern',
                                        'PUBLIC_LIMITED' => 'Public Limited Company',
                                        'PRIVATE_LIMITED' => 'Private Limited Company'
                                    ];
                                    echo $this->Form->control('status', [
                                        'class' => 'form-control', 'options' => $businessTypes, 'label' => 'Status'
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <?= $this->Form->create($vendorTemp, ['type' => 'file', 'id' => 'onbordingSubmit', 'class' => 'mb-0']) ?>
                <div class="card card-outline card-outline-tabs">
                    <div class="card-header p-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_address" data-toggle="pill"
                                    href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                    aria-selected="true">Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_branchoffice" data-toggle="pill"
                                    href="#custom-tabs-four-branch" role="tab" aria-controls="custom-tabs-four-branch"
                                    aria-selected="false">Branch Office /
                                    Factory</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_productionfaculty" data-toggle="pill"
                                    href="#custom-tabs-four-productionfaculty" role="tab"
                                    aria-controls="custom-tabs-four-productionfaculty" aria-selected="false">Production
                                    Facility</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab_contactperson" data-toggle="pill"
                                    href="#custom-tabs-four-contactperson" role="tab"
                                    aria-controls="custom-tabs-four-contactperson" aria-selected="false">Contact
                                    Person</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab_paymentdetails" data-toggle="pill"
                                    href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                    aria-selected="false">Payment
                                    Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_certificate" data-toggle="pill"
                                    href="#custom-tabs-four-certificate" role="tab"
                                    aria-controls="custom-tabs-four-certificate" aria-selected="false">Certificate</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab_questionnaire " data-toggle="pill"
                                    href="#custom-tabs-four-questionnaire" role="tab"
                                    aria-controls="custom-tabs-four-questionnaire"
                                    aria-selected="false">Questionnaire</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">

                            <div class="tab-pane fade active show" id="custom-tabs-four-profile" role="tabpanel"
                                aria-labelledby="tab_address" style="background-color: white;">
                                <div class="row">
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('address', ['name' => 'address[address]','class' => 'form-control', 'label' => "Address 1"]); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('address_2', ['name' => 'address[address_2]','label' => 'Address 2', 'class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('pincode', ['name' => 'address[pincode]','class' => 'form-control']); ?>
                                        </div>
                                    </div>

                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('city', ['name' => 'address[city]','class' => 'form-control']); ?>
                                        </div>
                                    </div>

                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('country', ['name' => 'address[country]','id'=>'id_country','class' => 'selectpicker form-control my-select', 'options' => $countries, 'data-live-search' => 'true', 'title' => 'Select Country']); ?>
                                        </div>
                                    </div>

                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('state', ['name' => 'address[state]','id'=>'id_state','class' => 'selectpicker form-control my-select', 'options' => $states, 'data-live-search' => 'true', 'title' => 'Select State']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <label for="id_telephone">Telephone</label>
                                            <input type="text" id="id_telephone" name="address[telephone]"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="checkboxPrimary1">
                                        <label for="checkboxPrimary1">Same as Below</label>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label>Registered Office Address:</label>
                                    </div>
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('register_office_address1', ['name' => 'address[register_office][address1]','class' => 'form-control', 'label' => "Address 1"]); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('register_office_address2', ['name' => 'address[register_office][address2]','label' => 'Address 2', 'class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('register_office_pincode', ['name' => 'address[register_office][pincode]', 'label' => 'Pincode', 'class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('register_office_city', ['name' => 'address[register_office][city]','class' => 'form-control','label' =>'City']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('register_office_country', ['name' => 'address[register_office][country]','class' => 'selectpicker form-control my-select', 'options' => $countries,'label'=>'Country','data-live-search' => 'true', 'title' => 'Select Country']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 col-md-3 mt-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('register_office_state', ['name' => 'address[register_office][state]','class' => 'selectpicker form-control my-select', 'options' => $states, 'label'=>'State', 'data-live-search' => 'true', 'title' => 'Select State']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 col-md-3 mt-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('register_office_telno', ['name' => 'address[register_office][telno]','type' => 'number', 'class' => 'form-control', 'label' => 'TEL. NO.']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 col-md-3 mt-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('register_office_faxno', ['name' => 'address[register_office][faxno]','type' => 'number', 'class' => 'form-control', 'label' => 'FAX NO.']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-branch" role="tabpanel"
                                aria-labelledby="tab_branchoffice" style="background-color: white;">

                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <label>
                                            Branch Office:
                                            <span class="badge lgreenbadge mt-2" data-toggle="tooltip"
                                                data-placement="right" id="addressButton" title=""
                                                data-original-title="Add Address">
                                                <i class="fas fa-plus-circle"></i>
                                            </span>
                                        </label>
                                        <div class="card">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Address 1</th>
                                                        <th>Address 2</th>
                                                        <th>Pincode</th>
                                                        <th>City</th>
                                                        <th>State</th>
                                                        <th>Country</th>
                                                        <th>Tan No</th>
                                                        <th>Fax No</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                            <input type="hidden"
                                                                name="branchfactory[branchoffice][0]['address1']">
                                                            Kanakia road homes
                                                        </th>
                                                        <th>
                                                            <input type="hidden"
                                                                name="branchfactory[branchoffice][0]['address2']">
                                                            Address 2
                                                        </th>
                                                        <td>
                                                            <input type="hidden"
                                                                name="branchfactory[branchoffice][0]['pincode']">
                                                            401107
                                                        </td>
                                                        <td><input type="hidden"
                                                                name="branchfactory[branchoffice][0]['city']">Mumbai
                                                        </td>
                                                        <td><input type="hidden"
                                                                name="branchfactory[branchoffice][0]['state']">Maharashtra
                                                        </td>
                                                        <td><input type="hidden"
                                                                name="branchfactory[branchoffice][0]['country']">India
                                                        </td>
                                                        <td><input type="hidden"
                                                                name="branchfactory[branchoffice][0]['tanno']">1234567890
                                                        </td>
                                                        <td><input type="hidden"
                                                                name="branchfactory[branchoffice][0]['faxno']">334755
                                                        </td>
                                                        <td>
                                                            <span class="badge lgreenbadge mt-2" id="editAdress"
                                                                data-toggle="tooltip" data-placement="right" title=""
                                                                data-original-title="Edit">
                                                                <i class="fas fa-user-edit"></i>
                                                            </span>
                                                            <span class="badge redbadge mt-2" data-toggle="tooltip"
                                                                data-placement="right" title=""
                                                                data-original-title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label>
                                        Factory Address:
                                        <span class="badge lgreenbadge mt-2" data-toggle="tooltip"
                                            data-placement="right" id="" title="" data-original-title="Add Address">
                                            <i class="fas fa-plus-circle"></i>
                                        </span>
                                    </label>

                                    <div class="card">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Address 1</th>
                                                    <th>Address 2</th>
                                                    <th>Pincode</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Country</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <input type="hidden"
                                                            name="branchfactory[factoryoffice][0]['address1']">
                                                        Kanakia road homes
                                                    </th>
                                                    <th>
                                                        <input type="hidden"
                                                            name="branchfactory[factoryoffice][0]['address2']">
                                                        Address 2
                                                    </th>
                                                    <td>
                                                        <input type="hidden"
                                                            name="branchfactory[factoryoffice][0]['pincode']">
                                                        401107
                                                    </td>
                                                    <td><input type="hidden"
                                                            name="branchfactory[factoryoffice][0]['city']">Mumbai
                                                    </td>
                                                    <td><input type="hidden"
                                                            name="branchfactory[factoryoffice][0]['State']">Maharashtra
                                                    </td>
                                                    <td><input type="hidden"
                                                            name="branchfactory[factoryoffice][0]['country']">India
                                                    </td>
                                                    <td><span class="badge lgreenbadge mt-2" id="" data-toggle="tooltip"
                                                            data-placement="right" title="" data-original-title="Edit">
                                                            <i class="fas fa-user-edit"></i>
                                                        </span>
                                                        <span class="badge redbadge mt-2" data-toggle="tooltip"
                                                            data-placement="right" title=""
                                                            data-original-title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="modal fade" id="modal-lg">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Branch Office Address</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <label>Branch Office:</label>
                                                    </div>

                                                    <div class="col-3 mt-3 col-md-3">
                                                        <div class="form-group">
                                                            <?php echo $this->Form->control('country', ['class' => 'selectpicker form-control my-select', 'options' => $countries,'name' => '', 'data-live-search' => 'true', 'title' => 'Select Country']); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 mt-3 col-md-3">
                                                        <div class="form-group">
                                                            <?php echo $this->Form->control('state', ['class' => 'selectpicker form-control my-select', 'options' => $states,'name' => '', 'data-live-search' => 'true', 'title' => 'Select State']); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 mt-3 col-md-3">
                                                        <div class="form-group">
                                                            <?php echo $this->Form->control('branch_address', ['class' => 'form-control', 'label' => 'Address 1','name' => '']); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 mt-3 col-md-3">
                                                        <div class="form-group">
                                                            <?php echo $this->Form->control('branch_address_2', ['label' => 'Address 2', 'class' => 'form-control','name' => '']); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 mt-3 col-md-3">
                                                        <div class="form-group">
                                                            <?php echo $this->Form->control('branch_pincode', ['class' => 'form-control','name' => '']); ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-3 mt-3 col-md-3">
                                                        <div class="form-group">
                                                            <?php echo $this->Form->control('branch_city', ['class' => 'form-control','name' => '']); ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-sm-6 mt-3">
                                                        <div class="form-group">
                                                            <?php echo $this->Form->control('branch_tan_no', ['type' => 'number', 'class' => 'form-control', 'label' => 'Branch Tel. No.','name' => '']); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 mt-3">
                                                        <div class="form-group">
                                                            <?php echo $this->Form->control('branch_fax_no', ['type' => 'number', 'class' => 'form-control', 'label' => 'FAX NO.','name' => '']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-custom">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3" style="border-right: 1px solid #dee2e6;">
                                    <div class="col-sm-6 col-lg-3">
                                        <label>Year of Registration:</label>
                                        <input name="branchfactory[year_of_registration]" type="number"
                                            class="form-control">
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <label>Registration No.</label>
                                        <input name="branchfactory[registration_no]" type="text" class="form-control">
                                    </div>

                                    <div class="col-sm-6 col-lg-4">
                                        <label class="form-label">Registration Certificate</label>
                                        <input class="" name="branchfactory[registration_certificate]" type="file" accept=".pdf" name="" id="">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-6 col-lg-4">
                                        <label>Year Of Commencement Of Production Of Items:</label>
                                        <input type="number" name="branchfactory[commencement_production]"
                                            class="form-control">
                                    </div>

                                    <div class="col-sm-6 col-lg-4">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('commencement_item', ['name'=>'branchfactory[commencement_item]','type' => 'text', 'class' => 'form-control', 'label' => 'Item']); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Year</label>
                                            <input type="number" name="branchfactory[commencement_year]"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <label>Small Scale Industry</label>

                                    <div class="col-sm-6 col-lg-2">
                                        <label>Year:</label>
                                        <input type="number" name="branchfactory[small_scale_year]"
                                            class="form-control">
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <label>Registration No.</label>
                                        <input type="text" name="branchfactory[small_scale_registration_no]"
                                            class="form-control">
                                    </div>

                                    <div class="col-sm-6 col-lg-4">
                                        <label class="form-label">Upload File</label>
                                        <input class="" name="branchfactory[small_scale_file]" type="file" accept=".pdf"
                                            name="" id="">
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-productionfaculty" role="tabpanel"
                                aria-labelledby="tab_productionfaculty" style="background-color: white;">

                                <div class="col-lg-3 col-sm-3 mt-3">
                                    <div class="form-group">
                                        <label>Branch of Address</label>
                                        <select class="form-control">
                                            <option disabled>Please Select</option>
                                            <option value="address1">Address1</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 mt-3">
                                        <label>Installed Capacity</label>
                                        <input type="text" name="productionFacility[branchaddress][0][installed_capacity]"
                                            class="form-control">
                                    </div>


                                    <div class="col-lg-3 col-sm-2 mt-3">
                                        <label>Power Avialable</label>
                                        <input type="text" name="productionFacility[branchaddress][0][power_avialable]"
                                            class="form-control">
                                    </div>


                                    <div class="col-lg-3 col-sm-2 mt-3">
                                        <label>Machinery Avialable</label>
                                        <input type="text" name="productionFacility[branchaddress][0][machinery_avialable]"
                                            class="form-control">
                                    </div>

                                    <div class="col-lg-3 col-sm-2 mt-3">
                                        <label>Raw Material Avi. and Source</label>
                                        <input type="text" name="productionFacility[branchaddress][0][raw_material]" class="form-control">
                                    </div>

                                    <div class="col-lg-3 col-sm-2 mt-3">
                                        <label>Upload File</label>
                                        <input class="form-control" name="productionFacility[branchaddress][0][product_facility_file]"
                                            type="file" accept=".pdf" name="" id="">
                                    </div>

                                </div>

                                <div class="col-lg-3 col-sm-3 mt-3">
                                    <div class="form-group">
                                        <label>Branch of factory</label>
                                        <select class="form-control">
                                            <option disabled>Please Select</option>
                                            <option value="address1">Address1</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">

                                    <label>Actual production during preceding 3 years</label>

                                    <div class="col-lg-3 col-sm-2 mt-3">
                                        <label id="years1"></label>
                                        <input type="text" class="form-control"
                                            name="productionFacility[production_during1]" id="">
                                    </div>
                                    <div class="col-lg-3 col-sm-2 mt-3">
                                        <label id="years2"></label>
                                        <input type="text" class="form-control"
                                            name="productionFacility[production_during2]" id="">
                                    </div>
                                    <div class="col-lg-3 col-sm-2 mt-3">
                                        <label id="years3"></label>
                                        <input type="text" class="form-control"
                                            name="productionFacility[production_during3]" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <label>Laboratory facilities available:</label>
                                        <input type="radio" name="productionFacility[lab_facilities]" checked
                                            value="yes">
                                        <label>Yes</label>
                                        <input type="radio" name="productionFacility[lab_facilities]" value="no">
                                        <label>No</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="lab_facilities-info" style="display: none;">
                                            <div class="text-container" id="lab_facilities_text">
                                                <input type="text" name="productionFacility[lab_facilities_text]"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Whether there is any isi registration :</label>

                                        <input type="radio" name="productionFacility[isi_registration]" value="yes">
                                        <label>Yes</label>
                                        <input type="radio" name="productionFacility[isi_registration]" value="no">
                                        <label>No</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="isi_registration-info" style="display: none;">
                                            <div class="text-container" id="isi_registration-text">
                                                <input type="text" name="productionFacility[lab_facilities_text]"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Test facilities available</label>

                                        <input type="radio" name="productionFacility[test_facilities]" value="yes">
                                        <label>Yes</label>
                                        <input type="radio" name="productionFacility[test_facilities]" value="no">
                                        <label>No</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="test_facilities-info" style="display: none;">
                                            <div class="text-container" id="test_facilities-info">
                                                <input type="text" name="productionFacility[test_facilities-info]"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Facilities for effective after sales services</label>

                                        <input type="radio" name="productionFacility[sales_services]" value="yes">
                                        <label>Yes</label>
                                        <input type="radio" name="productionFacility[sales_services]" value="no">
                                        <label>No</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="sales_services-info" style="display: none;">
                                            <div class="text-container" id="sales_services_text">
                                                <input type="text" name="productionFacility[sales_services_text]"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Quality control procedure adopted.</label>

                                        <input type="radio" name="productionFacility[quality-control]" value="yes">
                                        <label>Yes</label>
                                        <input type="radio" name="productionFacility[quality-control]" value="no">
                                        <label>No</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="quality-control-info" style="display: none;">
                                            <div class="text-container" id="quality-control_text">
                                                <input type="text" name="productionFacility[quality-control_text]"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label>Annual turn over in last 3 years:</label>
                                    <div class="col-lg-3">
                                        <label id="year1"></label>
                                        <input type="text" class="form-control" name="productionFacility[turn_over1]"
                                            id="">
                                    </div>
                                    <div class="col-lg-3">
                                        <label id="year2"></label>
                                        <input type="text" class="form-control" name="productionFacility[turn_over2]"
                                            id="">
                                    </div>
                                    <div class="col-lg-4">
                                        <label id="year3"></label>
                                        <input type="text" class="form-control" name="productionFacility[turn_over3]"
                                            id="">
                                    </div>

                                    <span style="font-size: smaller;display:none">
                                        <i>
                                            AVERAGE VALUE OF RAW MATERIALS HELD IN RESPECT OF ITEM FOR WHICH
                                            REGISTRATION IS SOUGHT.
                                        </i>
                                    </span>
                                </div>

                                <hr>
                                <div class="row">
                                    <label>Income tax cleaning certificate</label>
                                    <div class="col-lg-3">
                                        <label>CERTIFICATE No</label>
                                        <input type="number" name="productionFacility[income_certificate_no]"
                                            class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Date</label>
                                        <input type="date" name="productionFacility[income_date]" class="form-control">
                                    </div>

                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-6 mt-3">
                                        <label class="form-label">Latest Copy of Balance Sheet
                                        </label>
                                        <input class="form-control" type="file" accept=".pdf"
                                            name="productionFacility[balance_sheet_file]" id="">

                                        <i class="mt-2" style="color: black;">
                                            <a href="/bsms/webroot/templates/stock_upload.xlsx"
                                                download="">sample_file_template</a>
                                        </i>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-contactperson" role="tabpanel"
                                aria-labelledby="tab_contactperson" style="background-color: white;">
                                <div class="row">
                                    <div class="col-3 mt-1">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('contact_person', ['name' => 'contact_person[contact_person]', 'class' => 'form-control']); ?>
                                        </div>
                                    </div>

                                    <div class="col-3 mt-1">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('contact_email', ['name' => 'contact_person[contact_email]','class' => 'form-control']); ?>
                                        </div>
                                    </div>

                                    <div class="col-3 mt-1">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('contact_mobile', ['name' => 'contact_person[contact_mobile]','class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-1">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('contact_department', ['name' => 'contact_person[contact_department]','class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-1">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('contact_designation', ['name' => 'contact_person[contact_designation]','class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-2 mt-1">
                                        <input type="radio" name="contact_person[alternate][type]" value="Proprietor">
                                        <label>Proprietor</label>
                                    </div>
                                    <div class="col-2 mt-1">
                                        <input type="radio" name="contact_person[alternate][type]" value="Partner">
                                        <label>Partner</label>
                                    </div>
                                    <div class="col-2 mt-1">
                                        <input type="radio" name="contact_person[alternate][type]" checked
                                            value="Director">
                                        <label>Director</label>
                                    </div>

                                    <div class="col-12 mt-1">
                                        <label>Name:</label>
                                        <input type="text" name="contact_person[alternate][name]" class="form-control">
                                    </div>
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control("contact_person[alternate][address]", ['class' => 'form-control', 'label' => 'Address 1']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control("contact_person[alternate][address_2]", ['class' => 'form-control', 'label' => 'Address 2']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control("contact_person[alternate][pincode]", ['class' => 'form-control', 'label' => 'Address 2']); ?>

                                        </div>
                                    </div>

                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control("contact_person[alternate][city]", ['class' => 'form-control', 'label' => 'City']); ?>
                                        </div>
                                    </div>

                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('contact_person[alternate][state]', ['class' => 'selectpicker form-control my-select', 'options' => $states, 'label' => 'State', 'data-live-search' => 'true', 'title' => 'Select State']); ?>
                                        </div>
                                    </div>

                                    <div class="col-3 mt-3 col-md-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('contact_person[alternate][country]', ['class' => 'selectpicker form-control my-select', 'options' => $countries, 'label' => 'Country', 'data-live-search' => 'true', 'title' => 'Select Country']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel"
                                aria-labelledby="tab_paymentdetails" style="background-color: white;">
                                <div class="row">
                                    <label>Bank Details</label>
                                    <div class="col-3 mt-3">
                                        <label for="id_bankcountry">Bank Country</label>
                                        <input type="text" name="paymentdetails[bank_country]" class="form-control"
                                            id="id_bankcountry">
                                    </div>

                                    <div class="col-3 mt-3">
                                        <label for="id_bank_key">Bank Key (Account No.)</label>
                                        <input type="text" name="paymentdetails[bank_key]" class="form-control"
                                            id="id_bank_key">
                                    </div>

                                    <div class="col-3 mt-3">
                                        <label for="id_bank_name">Bank name</label>
                                        <input type="text" name="paymentdetails[bank_name]" class="form-control"
                                            id="id_bank_name">
                                    </div>

                                    <div class="col-3 mt-3">
                                        <label for="id_bank_city">City</label>
                                        <input type="text" class="form-control" id="id_bank_city"
                                            name="paymentdetails[bank_city]">
                                    </div>

                                    <div class="col-3 mt-3">
                                        <label for="id_bank_no">Bank number</label>
                                        <input type="text" class="form-control" id="id_bank_no"
                                            name="paymentdetails[bank_number]">
                                    </div>

                                    <div class="col-3 mt-3">
                                        <label for="id_swift_bic">SWIFT/BIC</label>
                                        <input type="text" class="form-control" id="id_swift_bic"
                                            name="paymentdetails[swift]">
                                    </div>

                                    <div class="col-3 mt-3">
                                        <label for="id_bank_branch">Bank Branch</label>
                                        <input type="text" class="form-control" id="id_bank_branch"
                                            name="paymentdetails[bank_branch]">
                                    </div>

                                    <div class="col-3 mt-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('tan_no', ['name' => 'paymentdetails[tan_no]','class' => 'form-control']); ?>
                                        </div>
                                    </div>

                                    <div class="col-3 mt-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('cin_no', ['name' => 'paymentdetails[cin_no]','class' => 'form-control', 'label' => 'CIN No.']); ?>
                                        </div>
                                    </div>

                                    <div class="col-3 mt-3">
                                        <?php echo $this->Form->control('order_currency', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-3 mt-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('gst_no', ['name' =>'paymentdetails[gst_no]','class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3">
                                        <label for="formFileMultiple1" class="form-label">GST Certificate</label>
                                        <input class="form-control" type="file" accept=".pdf"
                                            name="paymentdetails[gst_file]" id="formFileMultiple1">
                                        <small class="text-warning info-msg">Upload only PDF file</small>
                                    </div>
                                    <div class="col-6 mt-3"></div>
                                    <div class="col-3 mt-3">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('pan_no', ['name' =>'paymentdetails[pan_no]', 'class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-3">
                                        <label for="formFileMultiple2" class="form-label">Pan Card Document</label>
                                        <input class="form-control" accept=".pdf" type="file"
                                            name="paymentdetails[pan_file]" id="formFileMultiple2">
                                        <small class="text-warning info-msg">Upload only PDF file</small>
                                    </div>
                                    <div class="col-6 mt-3"></div>
                                    <div class="col-4 mt-3">
                                        <label for="formFileMultiple3" accept=".pdf" class="form-label">Upload
                                            Cancelled Cheque</label>
                                        <input class="form-control" type="file" name="paymentdetails[bank_file]"
                                            id="formFileMultiple3">
                                        <small class="text-warning info-msg">Upload only PDF file</small>
                                    </div>

                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-3 mt-3">
                                        <label>Vat Registration No.</label>
                                        <input type="number" class="form-control" id=""
                                            name="paymentdetails[vat_registration]">
                                    </div>
                                    <div class="col-3 mt-3">
                                        <label>C.S.T Details:</label>
                                        <input type="text" class="form-control" id=""
                                            name="paymentdetails[cst_details]">
                                    </div>

                                    <div class="col-3 mt-3">
                                        <label>Excise No:</label>
                                        <input type="text" class="form-control" id="" name="paymentdetails[excise_no]">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-certificate" role="tabpanel"
                                aria-labelledby="tab_certificate" style="background-color: white;">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-4 mt-3">
                                        <label>Registration No.</label>
                                        <input type="number" class="form-control"
                                            name="certificate[certificate_registration_no]">
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label class="form-label">ISO Registration / Certificate
                                        </label>
                                        <input class="form-control" type="file" accept=".pdf"
                                            name="certificate[iso_registration_file]" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6 mt-3 col-md-12">
                                        <div class="form-group">
                                            <label for="id_sigma">Six Sigma</label>
                                            <textarea id="id_sigma" name="certificate[six_sigma]" cols="30" rows="3"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="form-label">Upload File
                                        </label>
                                        <input class="form-control" type="file" accept=".pdf"
                                            name="certificate[certificate_file]" id="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-1">
                                    <label>HALAL Registration / certificate</label>
                                    <!-- <p>Please Attach copy and send our declaration form along with this form.</p> -->
                                    <div class="col-6 mt-3" style="border-right: 1px solid #dee2e6;">
                                        <label class="form-label">Upload File
                                        </label>
                                        <input class="form-control" type="file" accept=".pdf"
                                            name="certificate[halal_registration_file]" id="">
                                    </div>
                                    <div class="col-6 mt-3">
                                        <label class="form-label">Declaration
                                        </label>
                                        <input class="form-control" type="file" accept=".pdf"
                                            name="certificate[halal_declaration_file]" id="">

                                        <i class="mt-2" style="color: black;">
                                            <a href="/bsms/webroot/templates/stock_upload.xlsx"
                                                download="">sample_file_template</a>
                                        </i>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <label>Other Quality Certification</label>
                                    <label>Whether the item is completely manufactured in applicant's
                                        factory?</label>
                                    <div class="col-lg-12 mt-3">
                                        <input type="radio" name="certificate[fully_manufactured]" checked value="yes">
                                        <label>Yes</label>
                                        <input type="radio" name="certificate[fully_manufactured]" value="no">
                                        <label>No</label>
                                    </div>



                                    <div class="sub-contractors-info" style="display: none;">
                                        <div class="col-6 mt-1">
                                            <div class="form-group">
                                                <?php echo $this->Form->control('sub-contractor', ['name' =>'certificate[sub-contractor]','class' => 'form-control', 'label' => 'Names of Sub-Contractor']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-questionnaire" role="tabpanel"
                                aria-labelledby="tab_questionnaire" style="background-color: white;">
                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <label>Address of your reputed customers to whom reference can be made (use
                                            separate sheet) if necessary.</label>
                                        <textarea name="questionnaire[questionnaire1]" class="form-control" cols="30"
                                            rows="3"></textarea>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <h5>Other information considered relevent to be furnished by supplier</h5>
                                        <hr>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Does the company have any policy wrt to child labour appoint in work
                                            place</label>
                                        <textarea placeholder="" name="questionnaire[questionnaire2]"
                                            class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Does your company follow any anit - corruption policy (zero
                                            corruption ) &
                                            has follow ethical code of code / corporate social
                                            responsibilities:-</label>
                                        <textarea placeholder="" name="questionnaire[questionnaire3]"
                                            class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Does the company have policy &decimate between sexual worker wrt
                                            cast,
                                            gender, religion and harassment at work place</label>
                                        <textarea placeholder="" name="questionnaire[questionnaire4]"
                                            class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="col-lg-12 my-3">
                                        <label>Does the company use any product in the manufacturing of material
                                            through
                                            recycled material :-</label>
                                        <textarea placeholder="" name="questionnaire[questionnaire5]"
                                            class="form-control" cols="30" rows="3"></textarea>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <?php echo $this->Form->button('Submit', array('class' => 'btn bg-gradient-submit', 'type' => 'submit', 'id' => 'id_fksubmit', 'style' => 'background-color: #8E9B2C; color: #fff; font-size: 14px; line-height: 1.1rem; padding: 10px 20px;')); ?>
                    </div>
                </div>
                <div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <h6>Are you sure you want to proceed? This action cannot be edit.</h6>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn cancelButton" style="border:1px solid #6610f2"
                                    data-dismiss="modal">Cancel</button>
                                <?php echo $this->Form->button('Ok', array('class' => 'btn mt-3', 'style' => "border:1px solid #28a745", 'id' => 'id_ogsubmit')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('v_vendortemps_edit') ?>