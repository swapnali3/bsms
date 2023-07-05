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
<?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>
<?= $this->Html->script("CakeLte./AdminLTE/plugins/jquery-validation/jquery.validate.min.js") ?>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
<?= $this->Html->script('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js') ?>
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
        <div class="vendorTemps form content">
            <div class="d-flex justify-content-between">
                <div class="h">
                    <h4 class="text-info">
                        <legend>
                            <?= __('Onboarding') ?>
                            <button type="button" class="btn btn-outline-info btn-light chat" data-toggle="modal" data-target="#modal-lg" style="margin-left: 3em;">
                                <i class="fas fa-comments"></i> Need help</button>
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

                    <?= $this->Form->create($vendorTemp, ['type' => 'file', 'id' => 'onbordingSubmit']) ?>
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
                                <?php echo $this->Form->control('city', ['class' => 'form-control']); ?>
                            </div>
                        </div>

                        <div class="col-3 mt-3 col-md-3">
                            <div class="form-group">
                                <?php echo $this->Form->control('state', ['class' => 'selectpicker form-control my-select', 'options' => $states, 'data-live-search' => 'true', 'title' => 'Select State']); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 mt-3 col-md-3">
                            <div class="form-group">
                                <?php echo $this->Form->control('pincode', ['class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-3 mt-3 col-md-3">
                            <div class="form-group">
                                <?php echo $this->Form->control('country', ['class' => 'selectpicker form-control my-select', 'options' => $countries, 'data-live-search' => 'true', 'title' => 'Select Country']); ?>
                            </div>
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
                    </div>
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
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="formFileMultiple" class="form-label">Upload GST no</label>
                            <input class="form-control" type="file" accept=".pdf" name="gst_file" id="formFileMultiple">
                            <small class="text-warning info-msg">Upload only PDF file</small>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="formFileMultiple" class="form-label">Upload pan card</label>
                            <input class="form-control" accept=".pdf" type="file" name="pan_file" id="formFileMultiple">
                            <small class="text-warning info-msg">Upload only PDF file</small>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="formFileMultiple" accept=".pdf" class="form-label">Upload bank details</label>
                            <input class="form-control" type="file" name="bank_file" id="formFileMultiple">
                            <small class="text-warning info-msg">Upload only PDF file</small>
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

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg card card-primary card-outline direct-chat direct-chat-primary">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">Onboarding Process Ticket</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="direct-chat-messages" id="id_oldmsg">
                    <!-- <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                        </div>
                        <img class="direct-chat-img" src="..\..\..\img\U.png" alt="Message User Image">
                        <div class="direct-chat-text">
                            Is this template really for free? That's unbelievable!
                        </div>
                    </div>

                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                        </div>
                        <img class="direct-chat-img" src="..\..\..\img\U.png" alt="Message User Image">
                        <div class="direct-chat-text">
                            You better believe it!
                        </div>
                    </div> -->


                    <!-- <div class="card card-widget">
                        <div class="card-header">
                            <div class="user-block">
                                <img class="img-circle" src="..\..\..\img\U.png" alt="User Image">
                                <span class="username">Jonathan Burke Jr</span>
                                <span class="description">7:30 PM Today</span>
                            </div>
                      
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" title="Mark as read">
                                    <i class="far fa-circle"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                        </div>
                  
                        <div class="card-body" style="display: block;margin: 6px 24px;">
                            <p>I took this photo this morning. What do you guys think?</p>
                        </div>
                       

                    </div> -->
                </div>
            </div>
            <div class="modal-footer">

                <?= $this->Form->create($vendorTemp, ['id' => 'communiSubmit', 'style' => 'width:100%']) ?>



                <div class="input-group">
                    <input type="hidden" name="app_id" value="<?= h($vendorTemp->id) ?>">
                    <input type="text" name="message" placeholder="Message ..." class="form-control">
                    <span class="input-group-append">
                        <button type="submit" id="add_comm" class="btn btn-primary">Send</button>
                    </span>
                </div>

                <?= $this->Form->end() ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('.my-select').selectpicker();
    });


    
    $(document).ready(function() {
        function communication() {
            $.ajax({
                type: "GET",
                url: "<?php echo \Cake\Routing\Router::url(array('prefix' => false, 'controller' => 'msgchat-headers', 'action' => 'index')); ?>",
                dataType: 'json',
                success: function(response) {
                    $.each(response, function(index, row) {
                        var ndiv = '';
                        if (row['group_id'] == '1') {
                            ndiv = `<div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">` + row['fullname'] + `</span>
                                    <span class="direct-chat-timestamp float-right">` + row['updateddate'] + `</span>
                                </div>
                                <img class="direct-chat-img" src="..\\..\\..\\img\\U.png" alt="Message User Image">
                                <div class="direct-chat-text">` + row['message'] + `</div>
                            </div>`;
                        } else {
                            ndiv = `<div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">` + row['fullname'] + `</span>
                                <span class="direct-chat-timestamp float-left">` + row['updateddate'] + `</span>
                            </div>
                            <img class="direct-chat-img" src="..\\..\\..\\img\\U.png" alt="Message User Image">
                            <div class="direct-chat-text">` + row['message'] + `</div>
                        </div>`;
                        }
                        $("#id_oldmsg").append(ndiv);
                    });
                }
            });
        }

        communication();
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
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                $("#onbordingSubmit")[0].submit();
                return false;
            },
        });


        $('#add_comm').click(function(e) {
            e.preventDefault(); // Prevent the default form submission

            var formdata = new FormData($('#communiSubmit')[0]);

            var table_name = "vendor_temps";
            formdata.append('table_name', table_name);
            formdata.append('group_id', '2');


            $.ajax({
                type: "POST",
                url: "<?php echo \Cake\Routing\Router::url(array('prefix' => false, 'controller' => 'msgchat-headers', 'action' => 'add')); ?>",
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.status == '1') {
                        $('#id_oldmsg').empty();
                        communication();

                        $('#communiSubmit')[0].reset();
                    } else {



                    }
                }
            });
        });

    });
</script>