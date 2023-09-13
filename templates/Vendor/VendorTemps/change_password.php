<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Html->css('cstyle.css') ?>
<?= $this->Html->css('table.css') ?>
<?= $this->Html->css('listing.css') ?>
<?= $this->Html->css('b_index.css') ?>
<?= $this->Html->css('b_vendorCustom') ?>
<div class="card">
    <div class="card-header">
        Change Password
    </div>
    <div class="card-body">
        <?= $this->Form->create() ?>
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
            <?= $this->Form->control('current_password', ['label' => 'New Password', 'class'=>'form-control', 'type' => 'password']) ?>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
            <?= $this->Form->control('password', ['label' => 'Confirm Password', 'class'=>'form-control', 'type' => 'password']) ?>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 mt-3 pt-3">
                <?= $this->Form->button(__('Change Password'), ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>