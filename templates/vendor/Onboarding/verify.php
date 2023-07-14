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
.form-control{
    font-size:14px;
}
label {
    font-size: 11px;
    color: #999;
}
</style>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('v_index.css') ?>
<div class="container">
<div class="row">
    <div class="column-responsive">
        <div class="vendorTemps form content">
        <h3 class="mb-2 text-info"><?= __('Onboarding') ?></h3>
            <?= $this->Form->create($vendorTemp) ?>
               <span class="otp-send-email text-info"> OTP sent to <?= $vendorTemp->email ?></span>
                <div class="col-12 mt-3">
                <?php
                    echo $this->Form->control('otp', ['class' => 'form-control','div' => 'form-group' ,'placeholder'=>'Enter OTP' ,'required']);
                ?>
                </div>

            <div class="col-1 mt-1 pt-1">
                <?php echo $this->Form->button('Submit',array('class' => 'btn btn-custom mt-2'));?>
            </div>
            <?= $this->Form->end() ?>
            <img src="<?= $this->Url->build('/') ?>img/ft-icon.png" class="ft-icon">
            <img src="<?= $this->Url->build('/') ?>img/logo_s.png" class="vekpro-logo" widht="50">
        </div>
    </div>
</div>
</div>
