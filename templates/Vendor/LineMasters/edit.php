<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LineMaster $lineMaster
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lineMaster->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lineMaster->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Line Masters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lineMasters form content">
            <?= $this->Form->create($lineMaster) ?>
            <fieldset>
                <legend><?= __('Edit Line Master') ?></legend>
                <?php
                    echo $this->Form->control('sap_vendor_code');
                    echo $this->Form->control('name');
                    echo $this->Form->control('uom');
                    echo $this->Form->control('status');
                    echo $this->Form->control('added_date');
                    echo $this->Form->control('updated_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
