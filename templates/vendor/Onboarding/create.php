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
<!-- <?= $this->Html->css('CakeLte.style') ?> -->
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
                            <a class="nav-link" id="tab_contactperson" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Contact Person</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_paymentdetails" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Payment
                                Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_document" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Document</a>
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
                                        <?php echo $this->Form->control('address_2', ['class' => 'form-control']); ?>
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

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="tab_contactperson" style="background-color: white;">

                            <div class="row">
                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('contact_person', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('contact_email', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('contact_mobile', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('contact_department', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('contact_designation', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="tab_paymentdetails" style="background-color: white;">
                            <div class="row">


                                <div class="col-3 mt-3">
                                    <label for="id_bankcountry">Bank Country</label>
                                    <input type="text" class="form-control" id="id_bankcountry" name="">
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
                                        <?php echo $this->Form->control('cin_no', ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('gst_no', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('pan_no', ['class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-3 mt-3">
                                    <?php echo $this->Form->control('order_currency', ['disabled' => 'disabled', 'class' => 'form-control']); ?>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="tab_document" style="background-color: white;">

                            <div class="row">
                                <div class="col-4 mt-3">
                                    <label for="formFileMultiple" class="form-label">Upload GST no</label>
                                    <input class="form-control" required type="file" accept=".pdf" name="gst_file" id="formFileMultiple1">
                                    <small class="text-warning info-msg">Upload only PDF file</small>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="formFileMultiple" class="form-label">Upload pan card</label>
                                    <input class="form-control" required accept=".pdf" type="file" name="pan_file" id="formFileMultiple2">
                                    <small class="text-warning info-msg">Upload only PDF file</small>
                                </div>
                                <div class="col-4 mt-3">
                                    <label for="formFileMultiple" accept=".pdf" class="form-label">Upload bank
                                        details</label>
                                    <input class="form-control" required type="file" name="bank_file" id="formFileMultiple3">
                                    <small class="text-warning info-msg">Upload only PDF file</small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
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

    $(document).on("click", "#id_fksubmit", function () {
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

    $(document).on("click", "#add_comm", function () {
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
            success: function (resp) { if (resp.status == 1) { $('#unread'+sender_id).hide();} },
        });
    });

    $(document).ready(function() {

        $(".chatload").each(function () {
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
</script>