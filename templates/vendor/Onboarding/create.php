<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var string[]|\Cake\Collection\CollectionInterface $purchasingOrganizations
 * @var string[]|\Cake\Collection\CollectionInterface $accountGroups
 * @var string[]|\Cake\Collection\CollectionInterface $schemaGroups
 */




?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
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

    img.ft-icon {
        width: 40px;
        margin-right: -5px;
    }

    .vendorTemps.form.content {
        width: 70%;
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
    }
</style>
<div class="row">
    <div class="column-responsive column-80">
        <div class="vendorTemps form content">
            <div class="d-flex justify-content-between">
                <div class="h">
                    <h4 class="text-info">
                        <legend>
                            <?= __('Purchase Details') ?>
                        </legend>
                    </h4>
                </div>
                <div class="">
                    <img src="<?= $this->Url->build('/') ?>img/ft-icon.png" class="ft-icon">
                    <img src="<?= $this->Url->build('/') ?>img/logo_s.png" class="vekpro-logo" widht="50">
                </div>

            </div>


            <div class="card">
                <div class="card-body">
                    <?= $this->Form->create($vendorTemp) ?>
                    <div class="row">

                        <div class="col-3 mt-3 col-md-4">
                            <?php echo $this->Form->control('purchasing_organization_id', ['disabled' => 'disabled', 'options' => $purchasingOrganizations, 'class' => 'form-control']); ?>
                        </div>

                        <div class="col-3 mt-3 col-md-4">
                            <?php echo $this->Form->control('account_group_id', ['disabled' => 'disabled', 'options' => $accountGroups, 'class' => 'form-control']); ?>
                        </div>

                        <div class="col-3 mt-3 col-md-4">
                            <?php echo $this->Form->control('schema_group_id', ['disabled' => 'disabled', 'options' => $schemaGroups, 'class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 mt-3 col-md-4">
                            <?php echo $this->Form->control('name', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                        </div>

                        <div class="col-3 mt-3 col-md-4">
                            <?php echo $this->Form->control('mobile', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                        </div>

                        <div class="col-3 mt-3 col-md-4">
                            <?php echo $this->Form->control('email', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-3 mt-3 col-md-3">
                            <?php echo $this->Form->control('address', ['class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mt-3 col-md-3">
                            <?php echo $this->Form->control('address_2', ['class' => 'form-control']); ?>
                        </div>

                        <div class="col-3 mt-3 col-md-3">
                            <?php echo $this->Form->control('city', ['class' => 'form-control']); ?>
                        </div>

                        <div class="col-3 mt-3 col-md-3">
                            <?php echo $this->Form->control('state', ['class' => 'selectpicker form-control my-select', 'options' => $states, 'data-live-search' => 'true', 'title' => 'Select State']); ?>
                            
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-3 mt-3 col-md-3">
                            <?php echo $this->Form->control('pincode', ['class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mt-3 col-md-3">
                        <?php echo $this->Form->control('country', ['class' => 'selectpicker form-control my-select', 'options' => $countries, 'data-live-search' => 'true', 'title' => 'Select Country']); ?>
                        </div>
                        <div class="col-3 mt-3">
                            <?php echo $this->Form->control('payment_term', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                        </div>

                        <div class="col-3 mt-3">
                            <?php echo $this->Form->control('order_currency', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                        </div>




                    </div>
                    <div class="row">
                        <div class="col-3 mt-3">
                            <?php echo $this->Form->control('tan_no', ['class' => 'form-control']); ?>
                        </div>

                        <div class="col-3 mt-3">
                            <?php echo $this->Form->control('cin_no', ['class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mt-3">
                            <?php echo $this->Form->control('gst_no', ['class' => 'form-control']); ?>
                        </div>

                        <div class="col-3 mt-3">
                            <?php echo $this->Form->control('pan_no', ['class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 mt-3">
                            <?php echo $this->Form->control('contact_person', ['class' => 'form-control']); ?>
                        </div>

                        <div class="col-3 mt-3">
                            <?php echo $this->Form->control('contact_email', ['class' => 'form-control']); ?>
                        </div>

                        <div class="col-3 mt-3">
                            <?php echo $this->Form->control('contact_mobile', ['class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mt-3">
                            <?php echo $this->Form->control('contact_department', ['class' => 'form-control']); ?>
                        </div>
                        <div class="col-3 mt-3">
                            <?php echo $this->Form->control('contact_designation', ['class' => 'form-control']); ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="formFileMultiple" class="form-label">Upload GST no</label>
                            <input class="form-control" type="file" id="formFileMultiple">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="formFileMultiple" class="form-label">Upload pan card</label>
                            <input class="form-control" type="file" id="formFileMultiple">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="formFileMultiple" class="form-label">Upload bank details</label>
                            <input class="form-control" type="file" id="formFileMultiple">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 col-md-12 text-center mt-1 pt-1">
                <?php echo $this->Form->button('Submit', array('class' => 'btn btn-custom mt-3')); ?>
            </div>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
<script>
    $(function () {
        $('.my-select').selectpicker();
    });
</script>