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
                <legend><?= __('Edit Setting') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
