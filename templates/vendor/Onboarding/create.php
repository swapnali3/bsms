<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\vendorTemp $vendorTemp
 * @var string[]|\Cake\Collection\CollectionInterface $purchasingOrganizations
 * @var string[]|\Cake\Collection\CollectionInterface $accountGroups
 * @var string[]|\Cake\Collection\CollectionInterface $schemaGroups
 */

?>

<?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/summernote/summernote.min.css') ?>


<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
<?= $this->Html->script('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


<!-- <?= $this->Html->css('cstyle.css') ?> -->
<!-- <?= $this->Html->css('table.css') ?> -->
<style>
    .label {
        font-size: 10px
    }

    .row {
        margin-left: 0px;
        margin-right: 0px
    }

    img.vekpro-logo {
        width: 100px;
    }

    .info-msg {
        padding-left: 5px;
        font-size: 12px;
    }

    img.ft-icon {
        width: 40px;
        margin-right: -5px;
    }

    .vendorTemps.form.content {
        width: 80%;
        margin: 0 auto;
        background-color: #f5f7fd;
        margin-top: 20px;
    }

    .form-control {
        font-size: 14px;
    }

    label {
        font-size: 11px;
        color: #999;
        text-transform: none !important;
    }

    .vendorTemps .card-outline-tabs .nav-tabs a {
        font-size: 0.9rem;
    }
</style>
<!-- <?= $this->Html->css('listing.css') ?> -->
<!-- <?= $this->Html->css('v_index.css') ?> -->

<div class="row">
    <div class="column-responsive column-80">
        <?= $this->Form->create($vendorTemp, ['type' => 'file', 'id' => 'onbordingSubmit', 'class' => 'mb-0']) ?>
        <div class="vendorTemps form content">
            <div class="d-flex justify-content-between">
                <div class="h">
                    <h4 class="text-info">
                        <legend>
                            <?= __('Onboarding') ?>
                            <button type="button" id="needButton" data-modalbody="id_oldmsg" class="btn btn-outline-info btn-light chatload" data-sender_group_id="3" data-sender_id="<?= $vendorTemp->id ?>" data-sender_name="<?= $vendorTemp->name ?>" data-table_name="vendor_temps" data-table_pk="<?= $vendorTemp->id ?>" data-toggle="modal" data-target="#modal-lg" style="margin-left: 3em;">
                                <i class="fas fa-comments"></i> Need help
                                <span class="badge badge-info" id="unread<?= $vendorTemp->id ?>" style="transform: translate(19px, -15px);">0</span>
                            </button>
                        </legend>
                    </h4>
                </div>
                <div class="">
                    <img src="<?= $this->Url->build('/') ?>img/ft-icon.png" class="ft-icon">
                    <img src="<?= $this->Url->build('/') ?>img/logo_s.png" class="vekpro-logo" widht="50">
                </div>
            </div>
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 mb-2">
                            <?php echo $this->Form->control('title', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mb-2">
                            <?php echo $this->Form->control('name', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mb-2">
                            <?php echo $this->Form->control('email', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mb-2">
                            <?php echo $this->Form->control('mobile', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mb-2">
                            <?php echo $this->Form->control('purchasing_organization_id', ['disabled' => 'disabled', 'options' => $purchasingOrganizations, 'class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mb-2">
                            <?php echo $this->Form->control('account_group_id', ['disabled' => 'disabled', 'options' => $accountGroups, 'class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mb-2">
                            <?php echo $this->Form->control('schema_group_id', ['disabled' => 'disabled', 'options' => $schemaGroups, 'class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mb-2">
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
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab_address" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="true">Address</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_branchoffice" data-toggle="pill" href="#custom-tabs-four-branch" role="tab" aria-controls="custom-tabs-four-branch" aria-selected="false">Address of
                                Branch Office / Factory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_productionfaculty" data-toggle="pill" href="#custom-tabs-four-productionfaculty" role="tab" aria-controls="custom-tabs-four-productionfaculty" aria-selected="false">Production
                                Facility</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="tab_contactperson" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Contact Person</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="tab_companydetail" data-toggle="pill" href="#custom-tabs-four-companydetail" role="tab" aria-controls="custom-tabs-four-companydetail" aria-selected="false">Company Details</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="tab_paymentdetails" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Payment
                                Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_certificate" data-toggle="pill" href="#custom-tabs-four-certificate" role="tab" aria-controls="custom-tabs-four-certificate" aria-selected="false">Certificate</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="tab_document" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Document</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="tab_questionnaire " data-toggle="pill" href="#custom-tabs-four-questionnaire" role="tab" aria-controls="custom-tabs-four-questionnaire" aria-selected="false">Questionnaire</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="tab_address" style="background-color: white;">

                            <div class="row">

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address_2', ['label' => 'Address 1', 'class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('pincode', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('city', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('country', ['class' => 'selectpicker form-control my-select', 'options' => $countries, 'data-live-search' => 'true', 'title' => 'Select Country']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('state', ['class' => 'selectpicker form-control my-select', 'options' => $states, 'data-live-search' => 'true', 'title' => 'Select State']); ?>
                                    </div>
                                </div>


                                <!-- <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <label for="id_timezone">Timezone</label>
                                        <input type="text" id="id_timezone" class="form-control">
                                    </div>
                                </div> -->

                                <!-- <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <label for="id_language">Language</label>
                                        <input type="text" id="id_language" class="form-control">
                                    </div>
                                </div> -->

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <label for="id_telephone">Telephone</label>
                                        <input type="text" id="id_telephone" class="form-control">
                                    </div>
                                </div>

                                <!-- <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <label for="id_url">URL</label>
                                        <input type="text" id="id_url" class="form-control">
                                    </div>
                                </div> -->



                                <div class="col-6 mt-3 col-md-12">
                                    <div class="form-group">
                                        <label for="id_comments">Comments</label>
                                        <textarea id="id_comments" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label>Registered Office Address:</label>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address_2', ['label' => 'Address 1', 'class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('pincode', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('city', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('country', ['class' => 'selectpicker form-control my-select', 'options' => $countries, 'data-live-search' => 'true', 'title' => 'Select Country']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('state', ['class' => 'selectpicker form-control my-select', 'options' => $states, 'data-live-search' => 'true', 'title' => 'Select State']); ?>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address_telno', ['type' => 'number', 'class' => 'form-control', 'label' => 'TEL. NO.']); ?>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address_fax_no', ['type' => 'number', 'class' => 'form-control', 'label' => 'FAX NO.']); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-branch" role="tabpanel" aria-labelledby="tab_branchoffice" style="background-color: white;">

                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <label>Branch Office:</label>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address_2', ['label' => 'Address 1', 'class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('pincode', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('city', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('state', ['class' => 'selectpicker form-control my-select', 'options' => $states, 'data-live-search' => 'true', 'title' => 'Select State']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('country', ['class' => 'selectpicker form-control my-select', 'options' => $countries, 'data-live-search' => 'true', 'title' => 'Select Country']); ?>
                                    </div>
                                </div>

                               
                                <div class="col-lg-3 col-sm-6 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('tan_no', ['type' => 'number', 'class' => 'form-control', 'label' => 'Branch Tel. No.']); ?>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('fax_no', ['type' => 'number', 'class' => 'form-control', 'label' => 'FAX NO.']); ?>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <label>Factory Address:</label>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address_2', ['label' => 'Address 1', 'class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('pincode', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('city', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('state', ['class' => 'selectpicker form-control my-select', 'options' => $states, 'data-live-search' => 'true', 'title' => 'Select State']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('country', ['class' => 'selectpicker form-control my-select', 'options' => $countries, 'data-live-search' => 'true', 'title' => 'Select Country']); ?>
                                    </div>
                                </div>


                            </div>
                            <div class="row mt-3" style="border-right: 1px solid #dee2e6;">
                                <div class="col-sm-6 col-lg-2">
                                    <label>Year of Registration:</label>
                                    <input type="number" class="form-control">
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <label>Registration No.</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <label for="" class="form-label">Registration Certificate</label>
                                    <input class="form-control" required type="file" accept=".pdf" name="" id="">
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6 col-lg-4">
                                    <label>Year Of Commencement Of Production Of Items:</label>
                                    <input type="number" class="form-control">
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('item', ['type' => 'text', 'class' => 'form-control', 'label' => 'ITEM']); ?>
                                    </div>

                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="number" class="form-control">
                                    </div>

                                    <!-- <div class="col-sm-6 col-lg-2 mt-2">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('year', ['type' => 'number', 'class' => 'form-control', 'label' => 'Year']); ?>
                                    </div> -->
                                </div>


                            </div>
                            <hr>
                            <div class="row mt-3">
                                <label>Small Scale Industry</label>

                                <div class="col-sm-6 col-lg-2">
                                    <label>Year:</label>
                                    <input type="number" class="form-control">
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <label>Registration No.</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <label for="" class="form-label">Upload File</label>
                                    <input class="form-control" required type="file" accept=".pdf" name="" id="">
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-productionfaculty" role="tabpanel" aria-labelledby="tab_productionfaculty" style="background-color: white;">

                            <div class="row">
                                <div class="col-lg-3 col-sm-3 mt-3">
                                    <label>Installed Capacity</label>
                                    <input type="text" name="" class="form-control">
                                </div>

                                <div class="col-lg-3 col-sm-2 mt-3">
                                    <label>Upload File</label>
                                    <input class="form-control" type="file" accept=".pdf" name="" id="">
                                </div>
                                <div class="col-lg-3 col-sm-2 mt-3">
                                    <label>Power Avialable</label>
                                    <input type="text" name="" class="form-control">
                                </div>

                                <div class="col-lg-3 col-sm-2 mt-3">
                                    <label>Upload File</label>
                                    <input class="form-control" type="file" accept=".pdf" name="" id="">
                                </div>


                                <div class="col-lg-3 col-sm-2 mt-3">
                                    <label>Machinery Avialable</label>
                                    <input type="text" name="" class="form-control">
                                </div>

                                <div class="col-lg-3 col-sm-2 mt-3">
                                    <label>Upload File</label>
                                    <input class="form-control" type="file" accept=".pdf" name="" id="">
                                </div>

                                <div class="col-lg-3 col-sm-2 mt-3">
                                    <label>Raw Material Avi. and Source</label>
                                    <input type="text" name="" class="form-control">
                                </div>

                                <div class="col-lg-3 col-sm-2 mt-3">
                                    <label>Upload File</label>
                                    <input class="form-control" type="file" accept=".pdf" name="" id="">
                                </div>

                            </div>

                            <div class="row mt-3">

                                <label>Actual production during preceding 3 years</label>
                        
                                <div class="col-lg-3 col-sm-2 mt-3">
                                    <label id="years1"></label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                                <div class="col-lg-3 col-sm-2 mt-3">
                                    <label id="years2"></label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                                <div class="col-lg-3 col-sm-2 mt-3">
                                    <label id="years3"></label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <label>Laboratory facilities available:</label>
                                    <input type="radio" name="lab_facilities" value="yes">
                                    <label for="">Yes</label>
                                    <input type="radio" name="lab_facilities" value="no"> 
                                    <label for="">No</label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="lab_facilities-info" style="display: none;">
                                        <div class="text-container" id="lab_facilities_text">
                                            <input type="text" name="" class="form-control">
                                        </div>
                                    </div>
                                </div>




                                <div class="col-lg-12 mt-3">
                                    <label>Whether there is any isi registration :</label>

                                    <input type="radio" name="isi_registration" value="yes">
                                    <label for="">Yes</label>
                                    <input type="radio" name="isi_registration" value="no">
                                    <label for="">No</label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="isi_registration-info" style="display: none;">
                                        <div class="text-container" id="isi_registration-text">
                                            <input type="text" name="" class="form-control">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-lg-12 mt-3">
                                    <label>Test facilities available</label>

                                    <input type="radio" name="test_facilities" value="yes">
                                    <label for="">Yes</label>
                                    <input type="radio" name="test_facilities" value="no">
                                    <label for="">No</label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="test_facilities-info" style="display: none;">
                                        <div class="text-container" id="test_facilities-info">
                                            <input type="text" name="" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label>Facilities for effective after sales services</label>

                                    <input type="radio" name="sales_services" value="yes">
                                    <label for="">Yes</label>
                                    <input type="radio" name="sales_services" value="no">
                                    <label for="">No</label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="sales_services-info" style="display: none;">
                                        <div class="text-container" id="sales_services_text">
                                            <input type="text" name="" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-12 mt-3">
                                    <label>Quality control procedure adopted.</label>

                                    <input type="radio" name="quality-control" value="yes"> 
                                    <label for="">Yes</label>
                                    <input type="radio" name="quality-control" value="no">
                                    <label for="">No</label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="quality-control-info" style="display: none;">
                                        <div class="text-container" id="quality-control_text">
                                            <input type="text" name="" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label>Annual turn over in last 3 years:</label>
                                <div class="col-lg-3">
                                    <label id="year1"></label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                                <div class="col-lg-3">
                                    <label id="year2"></label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>
                                <div class="col-lg-4">
                                    <label id="year3"></label>
                                    <input type="text" class="form-control" name="" id="">
                                </div>

                                <span style="font-size: smaller;display:none"><i>AVERAGE VALUE OF RAW MATERIALS HELD IN RESPECT OF
                                        ITEM FOR WHICH REGISTRATION IS SOUGHT.</i></span>

                            </div>

                            <hr>
                            <div class="row">
                                <label>Income tax cleaning certificate</label>
                                <div class="col-lg-3">
                                    <label for="">CERTIFICATE No</label>
                                    <input type="number" name="" class="form-control">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Date</label>
                                    <input type="date" name="" class="form-control">
                                </div>

                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-6 mt-3">
                                    <label for="" class="form-label">Latest Copy of Balance Sheet
                                    </label>
                                    <input class="form-control" required="" type="file" accept=".pdf" name="" id="">

                                    <i class="mt-2" style="color: black;">
                                        <a href="/bsms/webroot/templates/stock_upload.xlsx" download="">sample_file_template</a>
                                    </i>


                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="tab_contactperson" style="background-color: white;">


                            <div class="row">
                                <div class="col-3 mt-1">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('contact_person', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-1">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('contact_email', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-1">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('contact_mobile', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-1">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('contact_department', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-1">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('contact_designation', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row ml-3">
                                <div class="col-2 mt-1">
                                    <div class="form-group">
                                        <?php echo $this->Form->radio('role', ['Proprietor' => 'Proprietor'], ['class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                                <div class="col-2 mt-1">
                                    <div class="form-group">
                                        <?php echo $this->Form->radio('role', ['Partner' => 'Partner'], ['class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                                <div class="col-2 mt-1">
                                    <div class="form-group">
                                        <?php echo $this->Form->radio('role', ['Director' => 'Director'], ['class' => 'form-check-input']); ?>
                                    </div>
                                </div>

                                <div class="col-12 mt-1">
                                    <label for="">Name:</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                                <!-- <div class="col-12 mt-1">
                                    <label for="">Address:</label>
                                    <textarea name="" class="form-control" cols="30" rows="3"></textarea>
                                </div> -->
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('address_2', ['label' => 'Address 1', 'class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('pincode', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('city', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('state', ['class' => 'selectpicker form-control my-select', 'options' => $states, 'data-live-search' => 'true', 'title' => 'Select State']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3 col-md-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('country', ['class' => 'selectpicker form-control my-select', 'options' => $countries, 'data-live-search' => 'true', 'title' => 'Select Country']); ?>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-certificate" role="tabpanel" aria-labelledby="tab_certificate" style="background-color: white;">
                            <div class="row">
                            <div class="col-sm-6 col-lg-4 mt-3">
                                    <label>Registration No.</label>
                                    <input type="number" class="form-control">
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="" class="form-label">ISO Registration / Certificate
                                    </label>
                                    <input class="form-control" required type="file" accept=".pdf" name="" id="">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 mt-3 col-md-12">
                                    <div class="form-group">
                                        <label for="id_sigma">Six Sigma</label>
                                        <textarea id="id_sigma" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <label for="" class="form-label">Upload File
                                    </label>
                                    <input class="form-control" required type="file" accept=".pdf" name="" id="">
                                </div>
                            </div>
                            <hr>


                            <div class="row mt-1">
                                <label>HALAL Registration / certificate</label>
                                <!-- <p>Please Attach copy and send our declaration form along with this form.</p> -->
                                <div class="col-6 mt-3" style="border-right: 1px solid #dee2e6;">
                                    <label for="" class="form-label">Upload File
                                    </label>
                                    <input class="form-control" required type="file" accept=".pdf" name="" id="">
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="" class="form-label">Declaration
                                    </label>
                                    <input class="form-control" required type="file" accept=".pdf" name="" id="">

                                    <i class="mt-2" style="color: black;">
                                        <a href="/bsms/webroot/templates/stock_upload.xlsx" download="">sample_file_template</a>
                                    </i>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <label>Other Quality Certification</label>
                                <label>Whether the item is completely manufactured in applicant's factory?</label>
                                <div class="col-2 ml-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->radio('fully_manufactured', ['1' => 'Yes'], ['class' => 'form-check-input', 'checked']); ?>
                                    </div>
                                </div>
                                <div class="col-2 ml-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->radio('fully_manufactured', [['0' => 'No']], ['class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                                <div class="sub-contractors-info" style="display: none;">
                                    <div class="col-6 mt-1">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('contact_person', ['class' => 'form-control', 'label' => 'Names of Sub-Contractor']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-companydetail" role="tabpanel" aria-labelledby="tab_companydetail" style="background-color: white;">
                            <div class="row">
                                <div class="col-lg-6" style="border-right: 1px solid #dee2e6;">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?php echo $this->Form->control('registation_no', ['type' => 'number', 'class' => 'form-control', 'label' => 'Company Registration No.']); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?php echo $this->Form->control('date', ['type' => 'date', 'class' => 'form-control', 'label' => 'Date']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="">Companies Act:</label>
                                            <textarea name="" class="form-control" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6" style="border-right: 1px solid #dee2e6;">
                                    <label>Company Act</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?php echo $this->Form->control('no', ['type' => 'number', 'class' => 'form-control', 'label' => 'No.']); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?php echo $this->Form->control('date', ['type' => 'date', 'class' => 'form-control', 'label' => 'Date']); ?>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Small Scale IND</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?php echo $this->Form->control('no', ['type' => 'number', 'class' => 'form-control', 'label' => 'No.']); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <?php echo $this->Form->control('date', ['type' => 'date', 'class' => 'form-control', 'label' => 'Date']); ?>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="tab_paymentdetails" style="background-color: white;">
                            <div class="row">
                                <label>Bank Details</label>
                                <div class="col-3 mt-3">
                                    <?php echo $this->Form->control('Bank_Country', ['class' => 'selectpicker form-control my-select', 'options' => $countries, 'data-live-search' => 'true', 'title' => 'Select Country']); ?>
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="id_bank_key">Bank Key (Account No.)</label>
                                    <input type="text" class="form-control" id="id_bank_key" name="">
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="id_bank_name">Bank name</label>
                                    <input type="text" class="form-control" id="id_bank_name" name="">
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="id_bank_city">City</label>
                                    <input type="text" class="form-control" id="id_bank_city" name="">
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="id_bank_no">Bank number</label>
                                    <input type="text" class="form-control" id="id_bank_no" name="">
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="id_swift_bic">SWIFT/BIC</label>
                                    <input type="text" class="form-control" id="id_swift_bic" name="">
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="id_bank_branch">Bank Branch</label>
                                    <input type="text" class="form-control" id="id_bank_branch" name="">
                                </div>

                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('tan_no', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('cin_no', ['class' => 'form-control', 'label'=>'CIN No.']); ?>
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
                                        <?php echo $this->Form->control('gst_no', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3">
                                    <label for="formFileMultiple" class="form-label">GST Certificate</label>
                                    <input class="form-control" required type="file" accept=".pdf" name="gst_file" id="formFileMultiple1">
                                    <small class="text-warning info-msg">Upload only PDF file</small>
                                </div>
                                <div class="col-6 mt-3"></div>
                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('pan_no', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3">
                                    <label for="formFileMultiple" class="form-label">Pan Card Document</label>
                                    <input class="form-control" required accept=".pdf" type="file" name="pan_file" id="formFileMultiple2">
                                    <small class="text-warning info-msg">Upload only PDF file</small>
                                </div><div class="col-6 mt-3"></div>
                                <div class="col-4 mt-3">
                                    <label for="formFileMultiple" accept=".pdf" class="form-label">Upload Cancelled Cheque</label>
                                    <input class="form-control" required type="file" name="bank_file" id="formFileMultiple3">
                                    <small class="text-warning info-msg">Upload only PDF file</small>
                                </div>

                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-3 mt-3">
                                    <label for="">Vat Registration No.</label>
                                    <input type="number" class="form-control" id="" name="">
                                </div>
                                <div class="col-3 mt-3">
                                    <label for="">C.S.T Details:</label>
                                    <input type="text" class="form-control" id="" name="">
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="">Excise No:</label>
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="tab_document" style="background-color: white;">

                            <div class="row">
                                
                           
                              
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-questionnaire" role="tabpanel" aria-labelledby="tab_questionnaire" style="background-color: white;">
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <label>Address of your reputed customers to whom reference can be made (use separate
                                        sheet) if necessary.

                                    </label>
                                    <textarea placeholder="" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <h5>Other information considered relevent to be furnished by supplier</h5>
                                    <hr>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label>Does the company have any policy wrt to child labour appoint in work
                                        place</label>
                                    <textarea placeholder="" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label>Does your company follow any anit - corruption policy (zero corruption ) &
                                        has follow ethical code of code / corporate social responsibilities:-</label>
                                    <textarea placeholder="" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label>Does the company have policy &decimate between sexual worker wrt cast,
                                        gender, religion and harassment at work place</label>
                                    <textarea placeholder="" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div class="col-lg-12 my-3">
                                    <label>Does the company use any product in the manufacturing of material through
                                        recycled material :-</label>
                                    <textarea placeholder="" class="form-control" cols="30" rows="3"></textarea>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <span class="text-center" style="font-size: large;color: #fb6500;">
            <b>NOTE : The company reserve the right to reject any application without assuring any reason.</b>
            </span>
        </div>

        <div class="col-3 col-md-12 text-center mt-1 pt-1">
            <!-- <?php echo $this->Form->button('Submit', array('class' => 'btn mt-3', 'style' => 'display:none;', 'id' => 'id_ogsubmit')); ?> -->

            <div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <h6>Are you sure you want to proceed? This action cannot be edit.</h6>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn cancelButton" style="border:1px solid #6610f2" data-dismiss="modal">Cancel</button>
                            <?php echo $this->Form->button('Ok', array('class' => 'btn mt-3', 'style' => "border:1px solid #28a745", 'id' => 'id_ogsubmit')); ?>

                        </div>
                    </div>
                </div>
            </div>


            <br>

            <?php echo $this->Form->button('Submit', array('class' => 'btn mt-3', 'type' => 'button', 'id' => 'id_fksubmit', 'style' => 'background-color: #8E9B2C; color: #fff; font-size: 14px; line-height: 1.1rem; padding: 10px 20px;')); ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
</div>

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-xl card card-primary card-outline direct-chat direct-chat-primary">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">Onboarding Process Ticket</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 65vh;min-height: 65vh; overflow-y: scroll;">
                <div class="direct-chat-messages" id="id_oldmsg" style="height:auto;">
                </div>
            </div>
            <div class="modal-footer">

                <?= $this->Form->create($vendorTemp, ['id' => 'communiSubmit', 'style' => 'width:100%']) ?>
                <div class="row">
                    <div class="col-sm-12 col-md-11 col-lg-11">
                        <div class="input-group">
                            <input type="hidden" id="id_table_pk" name="table_pk" value="">
                            <input type="hidden" id="id_sender_id" name="sender_id">
                            <input type="hidden" id="id_group_id" name="group_id">
                            <textarea id="summernote" name="message" placeholder="Message ..."></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-1 col-lg-1">
                        <span class="input-group-append mt-3">
                            <button type="button" id="add_comm" class="btn btn-primary">Send</button>
                        </span>
                    </div>
                </div>
                <?= $this->Form->end() ?>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
<?= $this->Html->script("CakeLte./AdminLTE/plugins/jquery-validation/jquery.validate.min.js") ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/summernote/summernote.min.js') ?>
<?= $this->Html->script('chat') ?>
<script>
    var getchaturl = "<?php echo \Cake\Routing\Router::url(array('prefix' => false, 'controller' => 'msgchat-headers', 'action' => 'index')); ?>";
    var postchaturl = "<?php echo \Cake\Routing\Router::url(array('prefix' => false, 'controller' => 'msgchat-headers', 'action' => 'add')); ?>";
    var seengeturl = "<?php echo \Cake\Routing\Router::url(array('prefix' => false, 'controller' => 'msgchat-headers', 'action' => 'seen-update')); ?>";
    var chatdata, user_id = "<?= h($vendorTemp->id) ?>",
        sender_id, table_pk;
    $(function() {
        $('.my-select').selectpicker();
        $('#summernote').summernote({
            width: 1000,
        });
    });

    $(document).on("click", "#id_fksubmit", function() {
        var submitcall = true;
        var tab = {
            "tab_address": ["address", "address-2", "pincode", "city", "country", "state"],
            "tab_contactperson": ["contact-person", "contact-person", "contact-mobile", "contact-department", "contact-designation"],
            "tab_paymentdetails": ["cin-no", "gst-no", "pan-no"],
            "tab_document": ["formFileMultiple1", "formFileMultiple2", "formFileMultiple3"]
        }

        for (const [index, row] of Object.entries(tab)) {
            for (const [indexs, rows] of Object.entries(row)) {
                var data = $("#" + rows).val();
                if (data == "" || data == null || data == undefined) {
                    $("#" + index).trigger('click');
                    submitcall = false;
                    break;
                }
            }
            if (submitcall == false) {

                setTimeout(function() {
                    if ($("#onbordingSubmit").valid()) {
                        $("#id_ogsubmit").trigger('click')
                    }
                }, 500);
                break;
            }
        }

        if (submitcall) {
            if ($("#onbordingSubmit").valid()) {
                $('#modal-sm').modal('show');
                $('#id_ogsubmit')[0].submit();
            }

        }
    });

    $(document).on("click", "#add_comm", function() {
        var formdata = new FormData($("#communiSubmit")[0]);
        formdata.append("table_name", "vendor_temps");
        resp = sendchat(postchaturl, formdata, $(this).data('modal_body'), $(this).data('sender_id'), getchaturl);
    });


    $('.cancelButton').click(function() {
        $('#modal-sm').modal('hide');
    });

    $('#needButton').click(function() {
        table_pk = $(this).data('table_pk');
        sender_id = $(this).data('sender_id');
        $("#id_sender_id").val($(this).data('sender_id'));
        $("#id_group_id").val($(this).data('sender_group_id'));
        $("#id_table_pk").val($(this).data('table_pk'));
        $("#add_comm").attr('data-modal_body', $(this).data('modalbody')).attr('data-sender_id', $(this).data('sender_id'));
        chat($(this).data('modalbody'), $(this).data('sender_id'), getchaturl, $(this).data('table_name'), $(this).data('table_pk'));

        $.ajax({
            type: "GET",
            url: seengeturl + "/vendor_temps/" + table_pk + "/" + sender_id,
            dataType: 'json',
            success: function(resp) {
                if (resp.status == 1) {
                    $('#unread' + sender_id).hide();
                }
            },
        });
    });

    $(document).ready(function() {

        $(".chatload").each(function() {
            $('#unread' + $(this).data('sender_id')).empty();
            getbadge($(this).data('sender_id'), getchaturl, "vendor_temps", $(this).data('table_pk'), 'unread' + $(this).data('sender_id'))
        });
        $("#onbordingSubmit").validate({
            rules: {
                address: {
                    required: true
                },
                city: {
                    required: true
                },
                state: {
                    required: true
                },
                pincode: {
                    required: true,
                    digits: true
                },
                country: {
                    required: true
                },
                payment_term: {
                    required: true
                },
                order_currency: {
                    required: true
                },
                tan_no: {
                    required: true
                },
                cin_no: {
                    required: true
                },
                gst_no: {
                    required: true
                },
                pan_no: {
                    required: true
                },
                contact_person: {
                    required: true
                },
                contact_email: {
                    required: true,
                    email: true
                },
                contact_mobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                contact_department: {
                    required: true
                },
                contact_designation: {
                    required: true
                }
            },
            messages: {
                address: {
                    required: "Please enter a Address"
                },
                city: {
                    required: "Please enter a city"
                },
                state: {
                    required: "Please enter a state"
                },
                pincode: {
                    required: "Please enter a pincode",
                    digits: true
                },
                country: {
                    required: "Please enter a country"
                },
                tan_no: {
                    required: "Please enter a tan no"
                },
                cin_no: {
                    required: "Please enter a cin no"
                },
                gst_no: {
                    required: "Please enter a gst no"
                },
                pan_no: {
                    required: "Please enter a pam no"
                },
                contact_person: {
                    required: "Please enter a contact person"
                },
                contact_email: {
                    required: "Please enter a contact email",
                    email: "Please enter a valid email address"
                },
                contact_mobile: {
                    required: "Please enter a contact mobile",
                    number: "Please enter a valid mobile number"
                },
                contact_department: {
                    required: "Please enter a contact department"
                },
                contact_designation: {
                    required: "Please enter a contact designation"
                },
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            }
        });

    });

    $('input[name="fully_manufactured"]').on('change', function() {
        if ($(this).val() === '0') {
            $('.sub-contractors-info').show();
        } else {
            $('.sub-contractors-info').hide();
        }
    });

    // ============================ Production facility js =========================

    $('input[name="lab_facilities"]').on('change', function() {
        if ($(this).val() === 'yes') {
            $('.lab_facilities-info').show();
        } else {
            $('.lab_facilities-info').hide();
        }
    });

    // ==================================ANNUAL TURN years ===========================
    var currentYear = new Date().getFullYear();

    var firstYearStart = (currentYear - 3) + '-' + (currentYear - 2);
    var firstYearText = firstYearStart;

    var secondYearStart = (currentYear - 2) + '-' + (currentYear - 1);
    var secondYearText = secondYearStart;

    var thirdYearStart = (currentYear - 1) + '-' + currentYear;
    var thirdYearText = thirdYearStart;


    $('#year1').text(firstYearText);
    $('#year2').text(secondYearText);
    $('#year3').text(thirdYearText);


    $('#years1').text(firstYearText);
    $('#years2').text(secondYearText);
    $('#years3').text(thirdYearText);

    // var thirdYearEnd = (currentYear + 1) + '-04-01'; // Assuming the financial year ends on April 1st of 
    // var thirdYearEndDate = new Date(thirdYearEnd);

    // var currentDate = new Date();

    // // Check if the current date is before April of the next year
    // if (currentDate < thirdYearEndDate) {
    //     alert("dsfg");
    //     // Update the second year's data

    //     secondYearText = (currentYear - 3) + '-' + (currentYear - 2);
    //     $('#year2').text(secondYearText);

    //     // Update the third year's data
    //     thirdYearStart = (currentYear - 2) + '-' + (currentYear - 1);
    //     thirdYearText = thirdYearStart;
    //     $('#year3').text(thirdYearText);
    // }
</script>