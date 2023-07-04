<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dailymonitor $dailymonitor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dailymonitor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dailymonitor->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Dailymonitor'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dailymonitor form content">
            <?= $this->Form->create($dailymonitor) ?>
            <fieldset>
                <legend><?= __('Edit Dailymonitor') ?></legend>
                <?php
                    echo $this->Form->control('vendor_id');
                    echo $this->Form->control('productionline_id');
                    echo $this->Form->control('target_production');
                    echo $this->Form->control('confirm_production');
                    echo $this->Form->control('status');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
