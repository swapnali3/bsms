<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTurnover $vendorTurnover
 * @var string[]|\Cake\Collection\CollectionInterface $vendorTemps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vendorTurnover->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vendorTurnover->ID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Vendor Turnovers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorTurnovers form content">
            <?= $this->Form->create($vendorTurnover) ?>
            <fieldset>
                <legend><?= __('Edit Vendor Turnover') ?></legend>
                <?php
                    echo $this->Form->control('vendor_temp_id', ['options' => $vendorTemps, 'empty' => true]);
                    echo $this->Form->control('first_year');
                    echo $this->Form->control('first_year_turnonver');
                    echo $this->Form->control('second_year');
                    echo $this->Form->control('second_year_turnonver');
                    echo $this->Form->control('third_year');
                    echo $this->Form->control('third_year_turnonver');
                    echo $this->Form->control('added_date', ['empty' => true]);
                    echo $this->Form->control('updated_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
