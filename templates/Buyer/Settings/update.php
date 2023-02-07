<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting $setting
 */
?>
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
            <div class="card-body">
                <div class="row">
                    <?php foreach($setting as $row) : ?>
                    <div class="col-sm-12 col-lg-3 mt-3">
                        <?php echo $this->Form->control($row->name, ['value' => $row->value, 'class' => 'custom-select rounded-0','div' => 'form-group']); ?>
                    </div>
                    <?php endforeach;?>
                    <div class="col-sm-12 col-lg-3 mt-3">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>