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
        font-weight: 400;
        margin-bottom: 0.5rem;
        margin-left: 0.25rem;
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: flex;
    }

    .text-info {
        color: #F79E33 !important;
        margin: 0;
    }

    .content {
        padding: 2rem;
        background: #ffffff;
        border-radius: 0.4rem;
        box-shadow: 0 7px 14px 0 rgba(60, 66, 87, 0.1), 0 3px 6px 0 rgba(0, 0, 0, 0.07);
    }

    .vendorTemps.form.content {
        width: 30%;
        margin: 0 auto;
        background-color: #f5f7fd;
        margin-top: 20px;
    }

    .form-control {
        display: block;
        width: 100%;
        border-radius: 3px;
        font-size: 14px;
        padding: 0.375rem 0.75rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        appearance: none;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        color: #212529;
        border:unset;
        background-color: #fff;
    }

    .forget-buttons{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-custom {
        background-color: #174071 !important;
        color: #fff !important;
        font-size: 14px;
        cursor: pointer;
        line-height: 1.1rem;
        padding: 10px 20px;
    }
</style>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('v_index.css') ?>
<div class="container-fluid">
    <div class="row">
        <div class="column-responsive">
            <div class="vendorTemps form content">
                <h3 class="mb-2 text-info"><?= __('Forget Password') ?></h3>
                <?= $this->Form->create() ?>
                <div class="col-12 mt-3">
                    <?php
                    echo $this->Form->control('email', ['class' => 'form-control', 'div' => 'form-group', 'placeholder' => 'Enter Email', 'label' => 'Email', 'required']);
                    ?>
                </div>
                <div class="forget-buttons">
                
                <?php echo $this->Form->button('Submit', array('class' => 'btn btn-custom mt-3', 'style' => 'color:#FFF!important')); ?>
                <a href="<?= $this->Url->build('/') ?>" class="btn mt-3" style="color: #174071 !important; text-decoration: underline;">Login</a>
                </div>
                <?= $this->Form->end() ?>
                <img src="<?= $this->Url->build('/') ?>img/ft-icon.png" class="ft-icon">
                <img src="<?= $this->Url->build('/') ?>img/logo_s.png" class="vekpro-logo" widht="50">
            </div>
        </div>
    </div>
</div>