<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting $setting
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="settings form content">
            <?= $this->Form->create($setting) ?>
            <fieldset>
                <legend><?= __('Settings') ?></legend>

                <?php foreach($setting as $row) : ?>
                <?php
                    echo $this->Form->control($row->name, ['value' => $row->value, 'class' => 'custom-select rounded-0','div' => 'form-group']);
                ?>
                <?php endforeach;?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
