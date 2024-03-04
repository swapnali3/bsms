<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var string[]|\Cake\Collection\CollectionInterface $purchasingOrganizations
 * @var string[]|\Cake\Collection\CollectionInterface $accountGroups
 * @var string[]|\Cake\Collection\CollectionInterface $schemaGroups
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('table.css') ?>
<style>
    .vendorTemps.form.content {
        background-color: #fff !important;
    }

    img.vekpro-logo {
        width: 100px;
    }

    img.ft-icon {
        width: 40px;
        margin-right: -5px;
    }

    .vendorTemps.form.content {
        width: 30%;
        margin: 0 auto;
        background-color: #f5f7fd;
        margin-top: 20px;
    }

    span.otp-send-email {
        font-size: 14px;
    }

    .form-control {
        font-size: 14px;
    }

    label {
        font-size: 11px;
        color: #999;
    }
</style>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('v_index.css') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/toastr/toastr.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.min.css') ?>
<?= $this->Html->script("CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.min.js") ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/toastr/toastr.min.js') ?>
<div class="container">
    <div class="row">
        <div class="column-responsive">
            <div class="vendorTemps form content">
                <h3 class="mb-2 text-info">
                    <?= __('Onboarding') ?>
                </h3>
                <?= $this->Form->create($vendorTemp) ?>
                <span class="otp-send-email text-info"> OTP sent to
                    <?= $vendorTemp->email ?>
                </span>
                <div class="col-12 mt-3">
                    <?php
                    echo $this->Form->control('otp', ['class' => 'form-control numberonly','div' => 'form-group' ,'placeholder'=>'Enter OTP' ,'required']);
                ?>
                </div>

                <div class="col-1 mt-1 pt-1">
                    <?php echo $this->Form->button('Submit',array('class' => 'btn btn-custom mt-2', 'style'=>'color:#FFF!important'));?>
                </div>
                <?= $this->Form->end() ?>
                <!-- <img src="<?= $this->Url->build('/') ?>img/ft-icon.png" class="ft-icon"> -->
                <img src="<?= $this->Url->build('/') ?>img/apar_logo.png" class="vekpro-logo">
            </div>
        </div>
    </div>
</div>
<script src="<?= $this->Url->build('/') ?>webroot/js/cscript.js"></script>
<script>
    var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    <?php if($flash) : ?>
        Toast.fire({
            icon: "<?= $flash['type'] ?>",
            title: "<?= $flash['msg'] ?>",
        });
    <?php endif; ?>
</script>