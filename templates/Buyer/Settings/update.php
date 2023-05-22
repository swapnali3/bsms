<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting $setting
 */
?>
 <?= $this->Html->css('custom') ?>
<div class="">
<div class="row">
    <!-- <div class="col-12">
        <?= $this->Form->create($setting) ?>
        <div class="card">
            <div class="card-header"style="
    background-color: #0095ff;
">
                <div class="settings form content">
                    <!-- <legend>
                        <h3 style="color:white;"><b><?= __('SETTNG') ?></b></h3>
                    </legend> -->
                </div>
            <!-- </div> --> 
            <div class="card-body setting-fm">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <h5>Edit Settings</h5>
                    </div>
                    <?php foreach($setting as $row) : ?>
                    <div class="col-sm-6 col-md-6 col-lg-6 mt-2">
                        <?php echo $this->Form->control($row->name, ['value' => $row->value, 'class' => 'custom-select rounded-0','div' => 'form-group']); ?>
                    </div>
                    <?php endforeach;?>
                    <div class="col-sm-12 col-lg-3 mt-2">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
